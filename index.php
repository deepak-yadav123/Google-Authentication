<html>
<head>
<title>Google Authentication </title>
<link rel="stylesheet" href="css.css">
<script>
  function Redirect() {
               window.location = "landing-page.php";
            }
</script>
    <script src="https://www.gstatic.com/firebasejs/9.8.3/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.8.3/firebase-auth.js"></script>
    <script src="https://cdn.firebase.com/libs/firebaseui/2.5.1/firebaseui.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/2.5.1/firebaseui.css" />
</head>

<body>
  
<div id="login-box">
  <div class="left">
    <h1>Sign up</h1>
    
    <input type="text" id="email" name="email" placeholder="E-mail" />
    <input type="password" id="password" name="password" placeholder="Password" />
    
    <input type="submit" id="saveData" name="signup_submit" value="Sign in" />
  </div>
  
  <div class="right">
    <span class="loginwith">Sign in with<br />social network</span>
    
    <button class="social-signin facebook">Log in with facebook</button>
    <button class="social-signin twitter">Log in with Twitter</button>
    <button class="social-signin google" id='login'>Log in with Google+</button>
  </div>
  <div class="or">OR</div>
</div>
    <div id="firebaseui-auth-container"></div>
    <script src="fireBase.js"></script>
    <script src="main.js"></script>
</body>

    <script type="module">
      // Import the functions you need from the SDKs you need
      import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.3/firebase-app.js";
      //import { GoogleAuthProvider } from "https://www.gstatic.com/firebasejs/9.8.3/firebase-app.js";
      import { getAuth ,GoogleAuthProvider, signInWithRedirect, getRedirectResult, signInWithPopup, signOut } from "https://www.gstatic.com/firebasejs/9.8.3/firebase-auth.js";
      // TODO: Add SDKs for Firebase products that you want to use
      // https://firebase.google.com/docs/web/setup#available-libraries

      // Your web app's Firebase configuration
      const firebaseConfig = {
        apiKey: "AIzaSyAYP8kFer_grz_x2Y00-jN5DFwHe_EKGk0",
        authDomain: "auth-df2cc.firebaseapp.com",
        projectId: "auth-df2cc",
        storageBucket: "auth-df2cc.appspot.com",
        messagingSenderId: "1024763179280",
        appId: "1:1024763179280:web:f10b778aea3662c650f595"
      };

      // Initialize Firebase
      const app = initializeApp(firebaseConfig);
      const auth = getAuth(app);
      const provider = new GoogleAuthProvider(app);

      login.addEventListener('click',(e) => {
     signInWithRedirect(auth, provider);


   //redirect the result
   getRedirectResult(auth)
     .then((result) => {
       // This gives you a Google Access Token. You can use it to access Google APIs.
       const credential = GoogleAuthProvider.credentialFromResult(result);
       const token = credential.accessToken;

       // The signed-in user info.
       const user = result.user;
      //  alert(user.displayName);
      Redirect();

     }).catch((error) => {
       // Handle Errors here.
       const errorCode = error.code;
       const errorMessage = error.message;
       // The email of the user's account used.
       const email = error.email;
       // The AuthCredential type that was used.
       const credential = GoogleAuthProvider.credentialFromError(error);
       // ...
       
  });
   

// sign in with popup tab
// signInWithPopup(auth, provider)
//   .then((result) => {
//     // This gives you a Google Access Token. You can use it to access the Google API.
//     const credential = GoogleAuthProvider.credentialFromResult(result);
//     const token = credential.accessToken;
//     // The signed-in user info.
//     const user = result.user;


//     alert(user.displayName);
//     // ...
//   }).catch((error) => {
//     // Handle Errors here.
//     const errorCode = error.code;
//     const errorMessage = error.message;
//     // The email of the user's account used.
//     const email = error.email;
//     // The AuthCredential type that was used.
//     const credential = GoogleAuthProvider.credentialFromError(error);
//     // ...

//     alert(errorMessage);
//   });
 });

  signOut.addEventListener('click',(e) => {

   signOut(auth).then(() => {
    // Sign-out successful.
   }).catch((error) => {
    // An error happened.
   });

  });

    </script>

 


</html>