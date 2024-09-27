import 'package:flutter/material.dart';
import 'dart:ui'; // For using ImageFilter.blur
import 'package:patasv2/screens/category.dart';

class EventsPage extends StatelessWidget {
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
            padding: const EdgeInsets.all(30.0),
            child: Column(
              mainAxisAlignment: MainAxisAlignment.center, // Center buttons vertically
              crossAxisAlignment: CrossAxisAlignment.stretch, // Ensure buttons take full width
              children: [
                buildEventButton(context, 'Pageant'),
                buildEventButton(context, 'Hip-hop'),
                buildEventButton(context, 'Vocal Solo'),
                buildEventButton(context, 'Duet'),
              ],
            ),
          ),
        ],
      ),
      appBar: AppBar(
        title: Text('EVENTS'),
        leading: IconButton(
          icon: Icon(Icons.arrow_back), // Back Button
          onPressed: () {
            Navigator.pop(context); // Go back to the previous screen
          },
        ),
      ),
    );
  }

  // Reusable Button for Events
  Widget buildEventButton(BuildContext context, String event) {
    return Padding(
      padding: const EdgeInsets.symmetric(vertical: 8.0),
      child: ElevatedButton(
        onPressed: () {
          if (event == 'Pageant') {
            Navigator.push(
              context,
              MaterialPageRoute(builder: (context) => CategoryPage()),
            );
          }
        },
        child: Text(event, style: TextStyle(fontSize: 24)),
        style: ElevatedButton.styleFrom(
          minimumSize: Size(double.infinity, 80), // Button height set to 80
        ),
      ),
    );
  }
}
