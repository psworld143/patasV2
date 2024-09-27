import 'dart:ui';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';

void main() => runApp(MyApp());

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
        debugShowCheckedModeBanner: false,
      home: LoginPage(),
    );
  }
}

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
          SingleChildScrollView( // Added for scrolling
            padding: const EdgeInsets.all(30.0),
            child: Column(
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
                buildCategoryButton(context, 'Contestant'),
                buildCategoryButton(context, 'Criteria'),
                buildCategoryButton(context, 'Score Sheets'),
                buildCategoryButton(context, 'Top 5 Finalist'),
                buildCategoryButton(context, 'Your Scorings'),
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


class ScoreSheets extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Stack(
        children: [
          // Background Image
          Container(
            decoration: BoxDecoration(
              image: DecorationImage(
                image: AssetImage('assets/background.jpeg'), // Your background image
                fit: BoxFit.cover,
              ),
            ),
          ),
          // Blurred Background
          BackdropFilter(
            filter: ImageFilter.blur(sigmaX: 10.0, sigmaY: 10.0),
            child: Container(
              color: Colors.black.withOpacity(0.1), // Semi-transparent overlay
            ),
          ),
          // Main content
          SafeArea(
            child: Center( // Centering the content
              child: SingleChildScrollView(
                padding: EdgeInsets.symmetric(horizontal: 20),
                child: Column(
                  mainAxisSize: MainAxisSize.min, // Make the column take minimum height
                  children: [
                    SizedBox(height: 20),
                    Container(
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
                        padding: EdgeInsets.all(20),
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
                                  "Candidate Number 1#",
                                  style: TextStyle(
                                    fontWeight: FontWeight.bold,
                                    fontSize: 16,
                                  ),
                                ),
                              ),
                            ),
                            SizedBox(height: 20),
                            Center(
                              child: Container(
                                width: 100,
                                height: 100,
                                decoration: BoxDecoration(
                                  shape: BoxShape.circle,
                                  color: Colors.grey.shade300,
                                ),
                                child: Center(
                                  child: Icon(Icons.person, size: 50, color: Colors.grey.shade600),
                                ),
                              ),
                            ),
                            SizedBox(height: 15),
                            Center(
                              child: Text(
                                'Angelo Salem',
                                style: TextStyle(
                                  fontSize: 20,
                                  fontWeight: FontWeight.bold,
                                ),
                              ),
                            ),
                            SizedBox(height: 20),
                            Text(
                              'Criteria',
                              style: TextStyle(
                                fontSize: 18,
                                fontWeight: FontWeight.bold,
                              ),
                            ),
                            SizedBox(height: 10),
                            Row(
                              mainAxisAlignment: MainAxisAlignment.spaceBetween,
                              children: [
                                Text(
                                  'Stage Projection',
                                  style: TextStyle(fontSize: 16),
                                ),
                                Container(
                                  padding: EdgeInsets.symmetric(horizontal: 10, vertical: 4),
                                  decoration: BoxDecoration(
                                    color: Colors.amber,
                                    borderRadius: BorderRadius.circular(15),
                                  ),
                                  child: Text(
                                    '30%',
                                    style: TextStyle(
                                      fontWeight: FontWeight.bold,
                                      fontSize: 14,
                                    ),
                                  ),
                                ),
                              ],
                            ),
                            SizedBox(height: 15),
                            Container(
                              padding: EdgeInsets.symmetric(horizontal: 15),
                              decoration: BoxDecoration(
                                color: Colors.grey.shade200,
                                borderRadius: BorderRadius.circular(10),
                              ),
                              child: TextField(
                                keyboardType: TextInputType.number, // Show numeric keyboard
                                inputFormatters: <TextInputFormatter>[
                                  FilteringTextInputFormatter.digitsOnly, // Allow only digits
                                ],
                                decoration: InputDecoration(
                                  hintText: 'Score',
                                  border: InputBorder.none,
                                ),
                              ),
                            ),
                          ],
                        ),
                      ),
                    ),
                    SizedBox(height: 20), // Added spacing to avoid crowding
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        ElevatedButton(
                          onPressed: () {}, // Handle preview action
                          child: Text('Preview'),
                          style: ElevatedButton.styleFrom(
                            foregroundColor: Colors.black,
                            backgroundColor: Colors.grey.shade300,
                            padding: EdgeInsets.symmetric(horizontal: 30, vertical: 15),
                            shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(10),
                            ),
                          ),
                        ),
                        ElevatedButton(
                          onPressed: () {}, // Handle next action
                          child: Text('Next'),
                          style: ElevatedButton.styleFrom(
                            foregroundColor: Colors.white,
                            backgroundColor: Colors.green,
                            padding: EdgeInsets.symmetric(horizontal: 40, vertical: 15),
                            shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(10),
                            ),
                          ),
                        ),
                      ],
                    ),
                    SizedBox(height: 20),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        Container(
                          width: 8,
                          height: 8,
                          decoration: BoxDecoration(
                            shape: BoxShape.circle,
                            color: Colors.blue,
                          ),
                        ),
                        SizedBox(width: 5),
                        Container(
                          width: 8,
                          height: 8,
                          decoration: BoxDecoration(
                            shape: BoxShape.circle,
                            color: Colors.grey.shade400,
                          ),
                        ),
                        SizedBox(width: 5),
                        Container(
                          width: 8,
                          height: 8,
                          decoration: BoxDecoration(
                            shape: BoxShape.circle,
                            color: Colors.grey.shade400,
                          ),
                        ),
                      ],
                    ),
                    SizedBox(height: 20),
                  ],
                ),
              ),
            ),
          ),
        ],
      ),
      appBar: AppBar(
        title: Text('SCORE SHEETS'),
        leading: IconButton(
          icon: Icon(Icons.arrow_back), // Back Button
          onPressed: () {
            Navigator.pop(context); // Go back to the previous screen
          },
        ),
      ),
    );
  }
}

class Top5Finalist extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Stack(
        children: [
          // Background Image
          Container(
            decoration: BoxDecoration(
              image: DecorationImage(
                image: AssetImage('assets/background.jpeg'), // Your background image
                fit: BoxFit.cover,
              ),
            ),
          ),
          // Blurred Background
          BackdropFilter(
            filter: ImageFilter.blur(sigmaX: 10.0, sigmaY: 10.0),
            child: Container(
              color: Colors.black.withOpacity(0.1), // Semi-transparent overlay
            ),
          ),
          // Main content
          SafeArea(
            child: Center( // Centering the content
              child: SingleChildScrollView(
                padding: EdgeInsets.symmetric(horizontal: 20),
                child: Column(
                  mainAxisSize: MainAxisSize.min, // Make the column take minimum height
                  children: [
                    SizedBox(height: 20),
                    Container(
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
                        padding: EdgeInsets.all(20),
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
                                  "Candidate Number 1#",
                                  style: TextStyle(
                                    fontWeight: FontWeight.bold,
                                    fontSize: 16,
                                  ),
                                ),
                              ),
                            ),
                            SizedBox(height: 20),
                            Center(
                              child: Container(
                                width: 100,
                                height: 100,
                                decoration: BoxDecoration(
                                  shape: BoxShape.circle,
                                  color: Colors.grey.shade300,
                                ),
                                child: Center(
                                  child: Icon(Icons.person, size: 50, color: Colors.grey.shade600),
                                ),
                              ),
                            ),
                            SizedBox(height: 15),
                            Center(
                              child: Text(
                                'Angelo Salem',
                                style: TextStyle(
                                  fontSize: 20,
                                  fontWeight: FontWeight.bold,
                                ),
                              ),
                            ),
                            SizedBox(height: 20),
                            Text(
                              'Criteria',
                              style: TextStyle(
                                fontSize: 18,
                                fontWeight: FontWeight.bold,
                              ),
                            ),
                            SizedBox(height: 10),
                            Row(
                              mainAxisAlignment: MainAxisAlignment.spaceBetween,
                              children: [
                                Text(
                                  'Stage Projection',
                                  style: TextStyle(fontSize: 16),
                                ),
                                Container(
                                  padding: EdgeInsets.symmetric(horizontal: 10, vertical: 4),
                                  decoration: BoxDecoration(
                                    color: Colors.amber,
                                    borderRadius: BorderRadius.circular(15),
                                  ),
                                  child: Text(
                                    '30%',
                                    style: TextStyle(
                                      fontWeight: FontWeight.bold,
                                      fontSize: 14,
                                    ),
                                  ),
                                ),
                              ],
                            ),
                            SizedBox(height: 15),
                            Container(
                              padding: EdgeInsets.symmetric(horizontal: 15),
                              decoration: BoxDecoration(
                                color: Colors.grey.shade200,
                                borderRadius: BorderRadius.circular(10),
                              ),
                              child: TextField(
                                keyboardType: TextInputType.number, // Show numeric keyboard
                                inputFormatters: <TextInputFormatter>[
                                  FilteringTextInputFormatter.digitsOnly, // Allow only digits
                                ],
                                decoration: InputDecoration(
                                  hintText: 'Score',
                                  border: InputBorder.none,
                                ),
                              ),
                            ),
                          ],
                        ),
                      ),
                    ),
                    SizedBox(height: 20), // Added spacing to avoid crowding
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        ElevatedButton(
                          onPressed: () {}, // Handle preview action
                          child: Text('Preview'),
                          style: ElevatedButton.styleFrom(
                            foregroundColor: Colors.black,
                            backgroundColor: Colors.grey.shade300,
                            padding: EdgeInsets.symmetric(horizontal: 30, vertical: 15),
                            shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(10),
                            ),
                          ),
                        ),
                        ElevatedButton(
                          onPressed: () {}, // Handle next action
                          child: Text('Next'),
                          style: ElevatedButton.styleFrom(
                            foregroundColor: Colors.white,
                            backgroundColor: Colors.green,
                            padding: EdgeInsets.symmetric(horizontal: 40, vertical: 15),
                            shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(10),
                            ),
                          ),
                        ),
                      ],
                    ),
                    SizedBox(height: 20),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        Container(
                          width: 8,
                          height: 8,
                          decoration: BoxDecoration(
                            shape: BoxShape.circle,
                            color: Colors.blue,
                          ),
                        ),
                        SizedBox(width: 5),
                        Container(
                          width: 8,
                          height: 8,
                          decoration: BoxDecoration(
                            shape: BoxShape.circle,
                            color: Colors.grey.shade400,
                          ),
                        ),
                        SizedBox(width: 5),
                        Container(
                          width: 8,
                          height: 8,
                          decoration: BoxDecoration(
                            shape: BoxShape.circle,
                            color: Colors.grey.shade400,
                          ),
                        ),
                      ],
                    ),
                    SizedBox(height: 20),
                  ],
                ),
              ),
            ),
          ),
        ],
      ),
      appBar: AppBar(
        title: Text('SCORE SHEETS'),
        leading: IconButton(
          icon: Icon(Icons.arrow_back), // Back Button
          onPressed: () {
            Navigator.pop(context); // Go back to the previous screen
          },
        ),
      ),
    );
  }
}
