import 'dart:ui';
import 'package:flutter/material.dart';
import 'package:patasv2/screens/scoresheets.dart';

import 'admin.dart';

class CategoryPage extends StatelessWidget {
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
                fit: BoxFit.cover,
              ),
            ),
          ),
          BackdropFilter(
            filter: ImageFilter.blur(sigmaX: 10.0, sigmaY: 10.0),
            child: Container(
              color: Colors.black.withOpacity(0.1),
            ),
          ),
          Padding(
            padding: const EdgeInsets.all(30.0),
            child: Column(
              children: [
                buildCategoryButton(context, 'jabbawockeez'),
                buildCategoryButton(context, 'XB Gensan'),
                buildCategoryButton(context, 'Bini'),
                buildCategoryButton(context, 'BTS'),
                buildCategoryButton(context, 'Jonard Ledon teams'),
              ],
            ),
          ),
        ],
      ),
      appBar: AppBar(
        title: Text('CATEGORY'),
        leading: IconButton(
          icon: Icon(Icons.arrow_back),
          onPressed: () {
            Navigator.pop(context);
          },
        ),
      ),
    );
  }

  Widget buildCategoryButton(BuildContext context, String category) {
    return Padding(
      padding: const EdgeInsets.symmetric(vertical: 8.0),
      child: ElevatedButton(
        onPressed: () {
          if (category == 'Score Sheets') {
            Navigator.push(
              context,
              MaterialPageRoute(builder: (context) => ScoreSheets()),
            );
          }
          else if (category == 'Top 5 Finalist') {
            Navigator.push(
              context,
              MaterialPageRoute(builder: (context) => Top5Finalist()),
            );
          }
          // Handle other categories as needed
        },
        child: Text(category, style: TextStyle(fontSize: 24)),
        style: ElevatedButton.styleFrom(
          minimumSize: Size(double.infinity, 80), // Button height set to 80
        ),
      ),
    );
  }
}