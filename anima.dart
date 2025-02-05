import 'package:flutter/material.dart';
import 'package:flutter_animate/flutter_animate.dart';

void main() {
  runApp(MaterialApp(home: DragDropGame()));
}

class DragDropGame extends StatefulWidget {
  @override
  _DragDropGameState createState() => _DragDropGameState();
}

class _DragDropGameState extends State<DragDropGame> {
  String? firstWord;
  String? secondWord;
  bool showFeedback = false;
  bool isCorrect = false;

  final List<String> words = ["yellow", "green", "blue", "angry", "scaly", "furry"];
  final List<String> correctWords = ["blue", "furry"]; // Example correct words

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color(0xFF5C4033), // Brown Background
      body: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          // Animated Sentence Introduction
          Padding(
            padding: const EdgeInsets.symmetric(horizontal: 20, vertical: 40),
            child: Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                Text("This is a ", style: _textStyle(Colors.white)).animate().fadeIn(duration: 600.ms),
                _buildDropTarget(isFirst: true),
                Text(", ", style: _textStyle(Colors.white)).animate().fadeIn(duration: 600.ms),
                _buildDropTarget(isFirst: false),
                Text(" monster.", style: _textStyle(Colors.white)).animate().fadeIn(duration: 600.ms),
              ],
            ),
          ),

          // Word Choices (Draggables)
          Expanded(
            child: GridView.count(
              crossAxisCount: 3,
              childAspectRatio: 2.5,
              padding: EdgeInsets.all(10),
              children: words
                  .map((word) => GestureDetector(
                        onTap: () {
                          _handleWordClick(word);
                        },
                        child: Draggable<String>(
                          data: word,
                          feedback: _buildDraggableWord(word, isDragging: true),
                          childWhenDragging: Opacity(opacity: 0.3, child: _buildDraggableWord(word)),
                          child: _buildDraggableWord(word),
                        ),
                      ))
                  .toList(),
            ),
          ),

          // Feedback Animation
          if (showFeedback)
            Text(
              isCorrect ? "✅ Great Job!" : "❌ Try Again!",
              style: TextStyle(fontSize: 24, fontWeight: FontWeight.bold, color: isCorrect ? Colors.green : Colors.red),
            ).animate().fadeIn(duration: 500.ms).shake(hz: 4, duration: 600.ms),

          // Confirm Button
          if (firstWord != null && secondWord != null)
            ElevatedButton(
              onPressed: _checkAnswer,
              child: Text("✔ Confirm", style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold)),
              style: ElevatedButton.styleFrom(
                backgroundColor: Colors.green,
                padding: EdgeInsets.symmetric(horizontal: 40, vertical: 15),
              ),
            ).animate().fadeIn(duration: 600.ms),

          SizedBox(height: 20),
        ],
      ),
    );
  }

  // Drop Target Box
  Widget _buildDropTarget({required bool isFirst}) {
    String? word = isFirst ? firstWord : secondWord;
    double width = word != null ? word.length * 12.0 + 20 : 60; // Dynamic width adjustment

    return DragTarget<String>(
      onAccept: (value) {
        setState(() {
          if (isFirst) {
            firstWord = value;
          } else {
            secondWord = value;
          }
        });
      },
      builder: (context, candidateData, rejectedData) {
        return Container(
          width: width,
          height: 40,
          alignment: Alignment.center,
          decoration: BoxDecoration(
            color: word != null ? Colors.transparent : Colors.white,
            border: Border.all(color: Colors.black, width: 2),
            borderRadius: BorderRadius.circular(10),
          ),
          child: Text(word ?? "____", style: _textStyle(Colors.white)),
        ).animate().fadeIn(duration: 800.ms);
      },
    );
  }

  // Draggable Word Style
  Widget _buildDraggableWord(String word, {bool isDragging = false}) {
    return Container(
      margin: EdgeInsets.all(5),
      padding: EdgeInsets.symmetric(horizontal: 12, vertical: 8),
      decoration: BoxDecoration(
        color: isDragging ? Colors.blueAccent : _getColorForWord(word),
        borderRadius: BorderRadius.circular(10),
      ),
      child: Center(
        child: Text(
          word,
          style: _textStyle(Colors.white),
        ),
      ),
    ).animate().scale(duration: 500.ms);
  }

  // Word Click Handling
  void _handleWordClick(String word) {
    if (firstWord == null) {
      setState(() {
        firstWord = word;
      });
    } else if (secondWord == null) {
      setState(() {
        secondWord = word;
      });
    }
  }

  // Checking Answer & Animations
  void _checkAnswer() {
    setState(() {
      isCorrect = firstWord == correctWords[0] && secondWord == correctWords[1];
      showFeedback = true;
    });

    if (isCorrect) {
      _showSuccessDialog();
    } else {
      Future.delayed(Duration(seconds: 2), () {
        setState(() {
          showFeedback = false;
          firstWord = null;
          secondWord = null;
        });
      });
    }
  }

  // Success Dialog & Animation
  void _showSuccessDialog() {
    showDialog(
      context: context,
      builder: (context) {
        return AlertDialog(
          title: Text("🎉 Congratulations!", style: _textStyle(Colors.black)),
          content: Column(
            mainAxisSize: MainAxisSize.min,
            children: [
              Text("You created a $firstWord, $secondWord monster!", style: _textStyle(Colors.black)),
              SizedBox(height: 20),
              Icon(Icons.star, color: Colors.amber, size: 50).animate().scale(duration: 700.ms),
            ],
          ),
          actions: [
            TextButton(
              onPressed: () {
                setState(() {
                  firstWord = null;
                  secondWord = null;
                  showFeedback = false;
                });
                Navigator.pop(context);
              },
              child: Text("Next Level"),
            ),
          ],
        );
      },
    );
  }

  // Custom Text Style using Material Font
  TextStyle _textStyle(Color color) {
    return TextStyle(
      fontSize: 22,
      fontWeight: FontWeight.bold,
      color: color,
      fontFamily: 'Roboto', // Default Material Font
    );
  }

  // Assign Colors for Words
  Color _getColorForWord(String word) {
    if (["yellow", "blue", "green"].contains(word)) {
      return Colors.purple[200]!; // Colors for color words
    } else {
      return Colors.green[700]!; // Colors for texture/emotion words
    }
  }
}
