import 'package:flutter/material.dart';
import 'package:patasv2/API/sync.dart';
import 'dart:ui'; // For using ImageFilter.blur
import 'scoresheets.dart';

class Contestant extends StatefulWidget {
  @override
  State<Contestant> createState() => _ContestantState();
}

class _ContestantState extends State<Contestant> {
  CloudSyncing cs = CloudSyncing();
  @override
  void initState(){
    super.initState();
    cs.downloadContestantsFromCloud(context);

  }
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Stack(
        children: [
          // Full-screen Background Image with Blur Effect
          Container(
            decoration: BoxDecoration(
              image: DecorationImage(
                image: AssetImage('assets/background.jpeg'), // Add your background image here
                fit: BoxFit.cover, // Makes the image cover the entire background
              ),
            ),
          ),
          // BackdropFilter to create a blur effect
          BackdropFilter(
            filter: ImageFilter.blur(sigmaX: 10.0, sigmaY: 10.0),
            child: Container(
              color: Colors.black.withOpacity(0.1), // Semi-transparent overlay
            ),
          ),
          SingleChildScrollView(
            padding: EdgeInsets.symmetric(horizontal: 20),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [
                SizedBox(height: 20),
                // Use the buildContestantBox function
                buildContestantBox(context, 'Angelo Salem', 'Male', '25', 'BSIT'),
                SizedBox(height: 20),
              ],
            ),
          ),
        ],
      ),
      appBar: AppBar(
        title: Text('CANDIDATES'),
        leading: IconButton(
          icon: Icon(Icons.arrow_back), // Back Button
          onPressed: () {
            Navigator.pop(context); // Go back to the previous screen
          },
        ),
      ),
    );
  }

  Widget buildContestantBox(
      BuildContext context, String name, String gender, String age, String representing) {
    return GestureDetector(
      onTap: () {
        Navigator.push(
          context,
          MaterialPageRoute(builder: (context) => Scoresheets()), // Navigate to ScoreSheets
        );
      },
      child: Container(
        decoration: BoxDecoration(
          color: Colors.white,
          borderRadius: BorderRadius.circular(20),
          boxShadow: [
            BoxShadow(
              color: Colors.black.withOpacity(0.1),
              blurRadius: 10,
              spreadRadius: 5,
            ),
          ],
        ),
        child: Padding(
          padding: EdgeInsets.all(15),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              Center(
                child: Container(
                  padding: EdgeInsets.symmetric(horizontal: 12, vertical: 6),
                  decoration: BoxDecoration(
                    color: Colors.amber,
                    borderRadius: BorderRadius.circular(20),
                  ),
                  child: Text(
                    "Candidate Number 1",
                    style: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 16,
                    ),
                  ),
                ),
              ),
              SizedBox(height: 20),
              Row(
                children: [
                  Container(
                    width: 100,
                    height: 150,
                    decoration: BoxDecoration(
                      color: Colors.grey.shade300,
                      borderRadius: BorderRadius.circular(10),
                    ),
                    child: Center(
                      child: Icon(
                        Icons.person_outline,
                        size: 80,
                        color: Colors.grey.shade600,
                      ),
                    ),
                  ),
                  SizedBox(width: 20),
                  Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      buildTextRow('Full Name:', name),
                      buildTextRow('Gender:', gender),
                      buildTextRow('Age:', age),
                      buildTextRow('Representing:', representing),
                      buildTextRow('Background:', ''),
                    ],
                  ),
                ],
              ),
            ],
          ),
        ),
      ),
    );
  }

  Widget buildTextRow(String label, String value) {
    return Padding(
      padding: const EdgeInsets.symmetric(vertical: 4),
      child: Row(
        children: [
          Text(
            label,
            style: TextStyle(
              fontWeight: FontWeight.bold,
              fontSize: 16,
            ),
          ),
          SizedBox(width: 8),
          Text(
            value,
            style: TextStyle(
              fontSize: 16,
            ),
          ),
        ],
      ),
    );
  }
}


