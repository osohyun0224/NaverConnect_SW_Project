// 퀴즈 객체 생성
function Question(text, choice, answer) {
  this.text = text;
  this.choice = choice;
  this.answer = answer;
}

// 퀴즈 정보 객체 생성
function Quiz(questions) {
  this.score = 0; // 점수
  this.questions = questions; // 질문[]
  this.questionIndex = 0; // 질문 순서
}

// ---------------------------------------------------------------------
var questions = [
  new Question(
    "AI와 친해져 보아요! 오늘 멘토들과 함께한 AI친구의 이름은 무엇인가요?",
    ["네오씽씽", "네오씽카", "네오빤짝", "네오네오"],
    "NEO"
  ),
  new Question(
    "동경한 동아리 이름에 들어가는 대학 중 아닌 것은?",
    ["동국대", "경기대", "한림대", "한양대"],
    "UNIV"
  ),
  new Question(
    "네오씽카를 조종하는 플랫폼의 이름은?",
    ["엔트리", "앤블랑", "엔엔트리트리", "트리리리리리"],
    "PLATFORM"
  ),
];

// 퀴즈 생성
var quiz = new Quiz(questions);

function update_quiz() {
  for (var i = 0; i < 4; i++) {
    var question = document.getElementById("question");
    var choice = document.getElementById("btn" + i);
    question.innerHTML = quiz.questions[quiz.questionIndex].text;
    choice.innerHTML = quiz.questions[quiz.questionIndex].choice[i];
    answer("btn" + i, choice);
  }
  progress();
}

// 판정
function answer(id, choice) {
  choice.onclick = function () {
    var answer = quiz.questions[quiz.questionIndex].answer; // 정답

    // 정답 판정
    if (choice.innerHTML == answer) {
      console.log("true");
      quiz.score++;
    } else {
      alert("틀렸습니다!");
    }

    if (quiz.questionIndex < quiz.questions.length - 1) {
      quiz.questionIndex++;
      update_quiz();
    } else {
      result();
    }
  }; // end onclick
} // end anwer()

// 문제 진행 정보 표시(x of y)
function progress() {
  var progress = document.getElementById("progress");
  progress.innerHTML =
    "문제 " + (quiz.questionIndex + 1) + " / " + quiz.questions.length;
}

function result() {
  var el = document.getElementById("quiz");
  var per = parseInt((quiz.score * 100) / quiz.questions.length);
  el.innerHTML =
    "<h1>결과</h1>" +
    '<h2 id="score"> 당신의 점수: ' +
    quiz.score +
    "/" +
    quiz.questions.length +
    "<br><br>" +
    per +
    "점</h2>";
}

update_quiz();
