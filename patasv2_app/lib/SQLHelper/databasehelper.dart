import 'package:sqflite/sqflite.dart';
import 'package:path/path.dart';

class DatabaseHelper{
  static final DatabaseHelper _instance = DatabaseHelper._internal();
  factory DatabaseHelper() => _instance;
  DatabaseHelper._internal();

  static Database? _database;

  Future<Database> get database async {
    if (_database != null) return _database!;
    _database = await _initDB('patasV2.db');
    return _database!;
  }

  Future<Database> _initDB(String fileName) async {
    String path = join(await getDatabasesPath(), fileName);
    return await openDatabase(path, version: 1, onCreate: _createDB);
  }

  Future<void> _createDB(Database db, int version) async {
    //MAS PREFER KO MAGAMIT TEXT NA DATATYPE PARA BASTA AHAHAHA(AKO HINDI)
    await db.execute('''
      CREATE TABLE IF NOT EXISTS contestants(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        firstname TEXT,
        middlename TEXT,
        lastname TEXT,
        age TEXT,
        gender TEXT,
        course TEXT,
        personal_background TEXT,
        image TEXT,
        contestant_no TEXT,
        added_by TEXT
      )
    ''');
    await db.execute('''
      CREATE TABLE IF NOT EXISTS scores(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        category TEXT,
        criteria_id TEXT,
        contestant TEXT,
        score TEXT,
        judge TEXT,
        transaction_date TEXT
      )
    ''');
    await db.execute('''
      CREATE TABLE IF NOT EXISTS final_score(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        contestant_id TEXT,
        category_id TEXT,
        total_score TEXT,
        final_score TEXT
      )
    
    ''');
    await db.execute('''
      CREATE TABLE IF NOT EXISTS event_category(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        category_name TEXT,
        description TEXT,
        order_number TEXT,
        percentage TEXT,
        isTabulated TEXT,
        added_by TEXT
      )
    ''');
    await db.execute('''
      CREATE  TABLE IF NOT EXISTS topfive(
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      contestant TEXT,
      score TEXT,
      added_by TEXT,
      dateAdded TEXT
    ''');
    await db.execute('''
      CREATE  TABLE IF NOT EXISTS courses(
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      course_name TEXT,
      description TEXT,
      added_by TEXT
    ''');
    await db.execute('''
      CREATE  TABLE IF NOT EXISTS criteria_archive(
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      criteria_name TEXT,
      description TEXT,
      added_by TEXT
    ''');
    await db.execute('''
      CREATE  TABLE IF NOT EXISTS criteria_information(
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      event_id TEXT,
      criteria_id TEXT,
      percentage TEXT,
      added_by TEXT
    ''');
    await db.execute('''
      CREATE  TABLE IF NOT EXISTS event_contestant(
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      event_id TEXT,
      contestant_id TEXT,
      status TEXT,
      added_by TEXT
    ''');
    await db.execute('''
      CREATE  TABLE IF NOT EXISTS admin_users(
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      firstname TEXT,
      middle_name TEXT,
      last_name TEXT,
      username TEXT,
      password TEXT,
      user_type TEXT,
      date_added TEXT
    ''');


  }
// Check if a contestant exists based on full name and contestant number
  Future<List<Map<String, dynamic>>> checkIfContestantExistsLocally(String firstname, String middlename, String lastname, String contestantNo) async {
    final db = await database;
    return await db.query('contestants',
        where: 'firstname = ? AND middlename = ? AND lastname = ? AND contestant_no = ?',
        whereArgs: [firstname, middlename, lastname, contestantNo]
    );
  }
// Insert a new contestant entry locally
  Future<int> insertContestantLocally(String firstname, String middlename, String lastname, String age, String gender, String course, String personalBackground, String image, String contestantNo, String addedBy) async {
    final db = await database;
    return await db.insert('contestants', {
      'firstname': firstname,
      'middlename': middlename,
      'lastname': lastname,
      'age': age,
      'gender': gender,
      'course': course,
      'personal_background': personalBackground,
      'image': image,
      'contestant_no': contestantNo,
      'added_by': addedBy
    });
  }
// Update an existing contestant entry locally
  Future<int> updateContestantLocally(String firstname, String middlename, String lastname, String age, String gender, String course, String personalBackground, String image, String contestantNo, String addedBy) async {
    final db = await database;
    return await db.update('contestants',
        {
          'firstname': firstname,
          'middlename': middlename,
          'lastname': lastname,
          'age': age,
          'gender': gender,
          'course': course,
          'personal_background': personalBackground,
          'image': image,
          'added_by': addedBy
        },
        where: 'contestant_no = ?',
        whereArgs: [contestantNo]
    );
  }
// Retrieve all contestants locally, ordered by ID in descending order
  Future<List<Map<String, dynamic>>> getAllContestantsLocally() async {
    final db = await database;
    return await db.query('contestants', orderBy: 'id DESC');
  }


// Scores Table Functions

// Check if a score entry exists for a specific judge, contestant, and criteria on a specific transaction date
  Future<List<Map<String, dynamic>>> checkIfScoreExistsLocally(String contestant, String criteriaId, String judge, String transactionDate) async {
    final db = await database;
    return await db.query('scores',
        where: 'contestant = ? AND criteria_id = ? AND judge = ? AND transaction_date = ?',
        whereArgs: [contestant, criteriaId, judge, transactionDate]);
  }

// Insert a new score entry locally
  Future<int> insertScoreLocally(String category, String criteriaId, String contestant, String score, String judge, String transactionDate) async {
    final db = await database;
    return await db.insert('scores', {
      'category': category,
      'criteria_id': criteriaId,
      'contestant': contestant,
      'score': score,
      'judge': judge,
      'transaction_date': transactionDate
    });
  }

// Update an existing score entry for a specific contestant, criteria, and judge
  Future<int> updateScoreLocally(String category, String criteriaId, String contestant, String score, String judge, String transactionDate) async {
    final db = await database;
    return await db.update('scores',
        {
          'category': category,
          'score': score,
          'transaction_date': transactionDate
        },
        where: 'criteria_id = ? AND contestant = ? AND judge = ?',
        whereArgs: [criteriaId, contestant, judge]);
  }

// Retrieve all score entries locally, ordered by transaction date in descending order
  Future<List<Map<String, dynamic>>> getAllScoresLocally() async {
    final db = await database;
    return await db.query('scores', orderBy: 'transaction_date DESC');
  }


// Admin Users method
// Check if there's an admin user
  Future<List<Map<String, dynamic>>> checkAccount() async {
    final db = await database;
    return await db.query('admin_users');
  }

// Insert Admin User
  Future<int> insertAdminUser(String firstName, String middleName, String lastName, String username, String password, String userType, String dateAdded) async {
    final db = await database;
    return await db.insert('admin_users', {
      'firstname': firstName,
      'middle_name': middleName,
      'last_name': lastName,
      'username': username,
      'password': password,
      'user_type': userType,
      'date_added': dateAdded,
    });
  }

// Check Admin User by username and password
  Future<List<Map<String, dynamic>>> checkUserCredentials(String username, String password) async {
    final db = await database;
    return await db.query(
      'admin_users',
      where: 'username = ? AND password = ?',
      whereArgs: [username, password],
    );
  }

// Insert a narrative for a specific user (if needed)
  Future<int> insertNarrative(String userID, String report) async {
    final db = await database;
    return await db.insert('narrative', {
      'user_id': userID,
      'report': report,
    },
        conflictAlgorithm: ConflictAlgorithm.replace);
  }

// Update a narrative for a specific user (if needed)
  Future<int> updateNarrative(String userID, String report) async {
    final db = await database;
    return await db.update(
      'narrative',
      {
        'report': report,
      },
      where: 'user_id = ?',
      whereArgs: [userID],
    );
  }

// Get narrative by userID (if needed)
  Future<List<Map<String, dynamic>>> getNarrative(String userID) async {
    final db = await database;
    return await db.query(
      'narrative',
      where: 'user_id = ?',
      whereArgs: [userID],
    );
  }

}