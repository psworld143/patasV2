import 'package:flutter/material.dart';
import 'dart:ui'; // For using ImageFilter.blur
import 'events.dart'; // Import the EventsPage for navigation

class LoginPage extends StatelessWidget {
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
              color: Colors.black.withOpacity(0.3), // Semi-transparent overlay for better contrast
            ),
          ),
          Center(
            child: Padding(
              padding: const EdgeInsets.symmetric(horizontal: 16.0),
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                crossAxisAlignment: CrossAxisAlignment.stretch,
                children: [
                  // Header Text
                  Text(
                    'TABULATION 2024',
                    textAlign: TextAlign.center,
                    style: TextStyle(
                      fontSize: MediaQuery.of(context).size.width * 0.07,
                      color: Colors.white,
                    ),
                  ),
                  SizedBox(height: 40.0),
                  // Login Card with Blur and Opacity Effect
                  Container(
                    padding: EdgeInsets.all(24.0),
                    decoration: BoxDecoration(
                      color: Colors.white, // White background for the card
                      borderRadius: BorderRadius.circular(20.0),
                      boxShadow: [
                        BoxShadow(
                          color: Colors.black26,
                          blurRadius: 10,
                          offset: Offset(0, 5),
                        ),
                      ],
                    ),
                    child: Column(
                      children: [
                        // Login Text
                        Text(
                          'Login',
                          style: TextStyle(
                            fontSize: 28.0,
                            fontWeight: FontWeight.bold,
                            color: Colors.black,
                          ),
                        ),
                        SizedBox(height: 20.0),
                        // Username Field
                        TextField(
                          decoration: InputDecoration(
                            labelText: 'Username',
                            border: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(10.0),
                            ),
                          ),
                        ),
                        SizedBox(height: 20.0),
                        // Password Field
                        TextField(
                          obscureText: true,
                          decoration: InputDecoration(
                            labelText: 'Password',
                            border: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(10.0),
                            ),
                          ),
                        ),
                        SizedBox(height: 30.0),
                        // Login Button
                        ElevatedButton(
                          onPressed: () {
                            Navigator.push(
                              context,
                              MaterialPageRoute(
                                builder: (context) => EventsPage(),
                              ),
                            );
                          },
                          child: Text(
                            'Login',
                            style: TextStyle(
                              color: Colors.white, // Set the text color to white
                              fontSize: 18, // You can also adjust the font size here
                            ),
                          ),
                          style: ElevatedButton.styleFrom(
                            backgroundColor: Colors.blue,
                            padding: EdgeInsets.symmetric(vertical: 15.0, horizontal: 80.0),
                            shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(30.0),
                            ),
                          ),
                        ),
                      ],
                    ),
                  ),
                ],
              ),
            ),
          ),
        ],
      ),
    );
  }
}
