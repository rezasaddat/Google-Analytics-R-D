<?php
  session_start();
  $idToken = $_SESSION['idToken'];
?>

<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="Client_id">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="js/jquerysession.js"></script>
  </head>
  <body>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" id="loginbtn" style="display:none"></div>
    <div id="message" style="display:none">
      <p>you have signed in this app</p>
    </div>
    <script>
        $(function() {
          let idToken = 'eyJhbGciOiJSUzI1NiIsImtpZCI6ImVlNGRiZDA2YzA2NjgzY2I0OGRkZGNhNmI4OGMzZTQ3M2I2OTE1YjkiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiYXpwIjoiMTA4MTc4MTY4MTA3Ni1jYm9hcmI0a2h2YWl0MmlvZHJlYzhlb2tudWcwYjZqdi5hcHBzLmdvb2dsZXVzZXJjb250ZW50LmNvbSIsImF1ZCI6IjEwODE3ODE2ODEwNzYtY2JvYXJiNGtodmFpdDJpb2RyZWM4ZW9rbnVnMGI2anYuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMTY4MDI4NjI3MDQxMjIyODI0NzUiLCJoZCI6ImJvbGVoZGljb2JhLmNvbSIsImVtYWlsIjoic2FkZGF0QGJvbGVoZGljb2JhLmNvbSIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJhdF9oYXNoIjoiaXNBUjdmbHB6alp5NmdJSVlxOGk1USIsIm5hbWUiOiJSZXphIFNhZGRhdCIsInBpY3R1cmUiOiJodHRwczovL2xoNS5nb29nbGV1c2VyY29udGVudC5jb20vLWJSaE5PUjFoNjBrL0FBQUFBQUFBQUFJL0FBQUFBQUFBQUFBL0FDSGkzcmNsUVNDNE0yQjUxdzJndkxKT3pIZmUyVXdOLVEvczk2LWMvcGhvdG8uanBnIiwiZ2l2ZW5fbmFtZSI6IlJlemEiLCJmYW1pbHlfbmFtZSI6IlNhZGRhdCIsImxvY2FsZSI6ImlkIiwiaWF0IjoxNTcwNTA2MzYzLCJleHAiOjE1NzA1MDk5NjMsImp0aSI6IjM5NjAzYTIxYTkxZjVhZGNmMTRmY2E3N2IxZGZhYTJlZDRjMGVhY2IifQ.BFQT6pAY5QScclMQmvZVl7VcVh-IgV6ATwyBGYFtgtNIwOQU2gk0AkGWQRfOsGt523bVhSvGgT8ohn0FljBKkZ0elJ4an9iEZu0F_BUyuqgmRisQi1KFEV94GDHI9pvsUvy_9uGQiAHgr32Kw-sXZLSsw89MkWqAuHeR4xcPtJEa_QrUJZSXvdQyH6lNpp5qj9KBPoq4GmxGXjLG7ZI1z8GEl7dELApC8OyN4HrEhshu60iHXr7gNiUJROrFzG8hDz6w5eL_cQ6Bn43tmR_5TymoLBlYWltNXQNZ3w2-wltR6wqnL272tEKISCEmgQ5IGMXvJ5zxsOpFyJC0Ez98Eg';
          $.ajax({
            url: 'https://oauth2.googleapis.com/tokeninfo?id_token='+idToken,
            contentType: "application/json; charset=utf-8", // this
            dataType: "json", // and this
            success: function(response){
              if (response != null) {
                $('#loginbtn').attr('style', 'display:none');
                $('#message').attr('style', 'display:block');
              } else {
                $('#loginbtn').attr('style', 'display:block');
                $('#message').attr('style', 'display:none');
              }
            },
            error: function(xhr){
              let resperr = xhr.responseJSON;
              $('#loginbtn').attr('style', 'display:block');
              $('#message').attr('style', 'display:none');
            },
          });

        });
        function onSignIn(googleUser) {
            // Useful data for your client-side scripts:
            var profile = googleUser.getBasicProfile();
            console.log("ID: " + profile.getId()); // Don't send this directly to your server!
            console.log('Full Name: ' + profile.getName());
            console.log('Given Name: ' + profile.getGivenName());
            console.log('Family Name: ' + profile.getFamilyName());
            console.log("Image URL: " + profile.getImageUrl());
            console.log("Email: " + profile.getEmail());

            // The ID token you need to pass to your backend:
            var id_token = googleUser.getAuthResponse().id_token;
            console.log("ID Token: " + id_token);
            
            //set session
            $.session.set('idToken', id_token);
        }
    </script>
  </body>
</html>