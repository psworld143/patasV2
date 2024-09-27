import 'dart:async';
import 'dart:convert';

import 'package:awesome_dialog/awesome_dialog.dart';
import 'package:flutter/foundation.dart';
import 'package:flutter/material.dart';
import 'package:percent_indicator/linear_percent_indicator.dart';
import 'package:patasv2/SQLHelper/DatabaseHelper.dart';
import 'package:http/http.dart' as http;
import 'package:patasv2/globals.dart' as globals;

DatabaseHelper dbHelper = DatabaseHelper();

String uploadMessage = "";

class CloudSyncing{
  void downloadContestantsFromCloud(BuildContext context) async {
    if (kDebugMode) {
      print('Trying to download contestants');
    }

    var client = http.Client();
    try {
      var response = await client.post(
          Uri.parse("${globals.apiURL}get_contestant.php"),
          body: {
            'apiKey': 'Seait2024'//Assuming you have a judge identifier
          }
      );
      print(response.toString());

      var decodedResponse = jsonDecode(utf8.decode(response.bodyBytes)) as Map;
      var result = decodedResponse['result'];
      var message = decodedResponse['message'];
      var contestantsData = decodedResponse['contestants'];

      if (kDebugMode) {
        print(message);
      }

      int duration = (contestantsData.length) * 1000;
      contestantDownloadProgressDialog(context, duration);  // You can define this function for UI feedback

      if (result == 'true') {
        // Iterate through contestants and update or insert them locally
        for (var i = 0; i < contestantsData.length; i++) {
          // Local variables from the response
          var firstname = contestantsData[i]['firstname'];
          var middlename = contestantsData[i]['middlename'];
          var lastname = contestantsData[i]['lastname'];
          var age = contestantsData[i]['age'];
          var gender = contestantsData[i]['gender'];
          var course = contestantsData[i]['course'];
          var personalBackground = contestantsData[i]['personal_background'];
          var image = contestantsData[i]['image'];
          var contestantNo = contestantsData[i]['contestant_no'];
          var addedBy = contestantsData[i]['added_by'];

          // Check if the contestant exists locally
          var checkContestantLocallyResult = await dbHelper.checkIfContestantExistsLocally(
              firstname, middlename, lastname, contestantNo);

          if (checkContestantLocallyResult.isNotEmpty) {
            // Update existing contestant record
            await dbHelper.updateContestantLocally(
                firstname, middlename, lastname, age, gender, course, personalBackground, image, contestantNo, addedBy);
          } else {
            // Insert new contestant record locally
            await dbHelper.insertContestantLocally(
                firstname, middlename, lastname, age, gender, course, personalBackground, image, contestantNo, addedBy);

            if (kDebugMode) {
              print('One contestant record added to the local database.');
            }
          }

          // Delay to simulate progress
          await Future.delayed(const Duration(seconds: 2));  // For smoother animation
        }

      } else {
        if (kDebugMode) {
          print(message);
        }
      }

    } finally {
      client.close();
    }
  }

  void contestantDownloadProgressDialog(BuildContext context, int duration) {
    // Show the dialog with a progress indicator
    showDialog(
      context: context,
      barrierDismissible: false, // Prevent dismissing by tapping outside the dialog
      builder: (BuildContext context) {
        return AlertDialog(
          content: Column(
            mainAxisSize: MainAxisSize.min,
            children: [
              CircularProgressIndicator(), // Progress Indicator
              const SizedBox(height: 20),
              const Text('Downloading contestant data...'), // Informational text
            ],
          ),
        );
      },
    );

    // Automatically close the dialog after the specified duration
    Timer(Duration(milliseconds: duration), () {
      Navigator.of(context, rootNavigator: true).pop(); // Close the dialog
    });
  }
}




