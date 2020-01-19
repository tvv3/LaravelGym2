# LaravelGym2
Laravel2

This is an application for a gym and has the following pages:
- The register page where a user who is a client can enter and sign up (his role will be client by default)
- The login page where any user can enter and login.
- The page Administrare is vizible only for a user with role2 = admin (this field can be set only directly in the
 database). 
This page will show the users who are clients and for each of them we will be able to set extra details in another 
page accesible with a button or we can delete the extra details for a specific client with another button.
- Similarly we have the page Adm_angajati, which is vizible only for a user with role2 = admin (this field can be
 set only directly in the database). 
This page will show the users who are employees of the gym and for each of them we will be able to set extra details
 if they are trainers in another page accesible with a button or we can delete the extra details for a specific 
 trainer with another button.
- Observation: The delete buttons in Administrare page and Adm_angajati page have alerts of type
 "Are you sure you want to proceed ?"
- There is a page named Register_angajati where if you are logged in as admin you can create a employee user with 
 role= agent_vz (salesman) or antrenor (trainer) or manager.
- The page antrenori(trainers) is vizible to all vizitors of the website and shows only the employees who
 are also trainers.
- The client page is accesible if you connect with a client user and shows the extra details of that client.
