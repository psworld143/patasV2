import 'package:flutter/material.dart';
import 'package:patasv2/screens/login.dart'; // Assuming login.dart contains your LoginPage


void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Event Management',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: LoginPage(), // Start with the LoginPage
    );
  }
}
