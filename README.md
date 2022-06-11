## About Project

 company has multiple departments and each employee works in one of the departments. Each employee may have multiple contact numbers and addresses:

 ## How To Run

 1. Clone the repo and run below command:- <br />
     composer install

2. Add database details in .env file create .env from .env.example  

3. Run migration to create database tables:- <br />
    php artisan migrate

4. Run Passport install for personal access client:- <br />
    php artisan passport:install

5. Run api endpoints in api client and run server:- <br />
    php artisan serve

6. First register and login the user the auth token get genarated  <br />
    end points for registration and login <br />
    1. api/register <br />
       Parameters:-  <br />
        name: text <br />
        email: text email <br />
        password: text or number <br />
        password_confirmation: sam as password <br />
    Then auth token got genarated use for run department and employee api <br /> 
    <br />

   2. api/login <br />
       Parameters:-  <br />
        email: text email <br />
        password: text or number <br />
   Then auth token got genarated use for run department and employee api <br /> 

6. Below are the end points for department and employee  <br />
    First Create departments:-  <br />
    1. POST api/department => create department  <br />
      Header Parameters:-  <br />
       Authorization: Bearer token <br />
      Form Parameters:-  <br />
       dep_name: text <br />
      <br /> 

   2. GET api/department  => get all department  <br />
      Header Parameters:-  <br />
       Authorization: Bearer token <br />
      <br />

    3. GET api/department/id  => get department by id  <br />
      Header Parameters:-  <br />
       Authorization: Bearer token <br />
      <br />  

    4. PUT api/department/id  => Update department by id  <br />
      Header Parameters:-  <br />
       Authorization: Bearer token <br />
      Form Parameters:-  <br />
       dep_name: text <br />
      <br />  

    5. DELETE api/department/id  => Delete department by id  <br />
      Header Parameters:-  <br />
       Authorization: Bearer token <br />
      <br />  

    Employee api endpoints:-  <br />

     1. POST api/employee => create employee  <br />
      Header Parameters:-  <br />
       Authorization: Bearer token <br />
      Form Parameters:-  <br />
       name: text <br />
       age: text <br />
       job: text <br />
       salary: number <br />
       dep_id: text <br />
       contacts: number (or pass as array like contacts[0],contacts[1],... for multiple contact creation ) <br />
       address: text (or pass as array like address[0],address[1],... for multiple address creation) <br />
      <br /> 

   2. GET api/employee  => get all employee's with associated contacts and address  <br />
      Header Parameters:-  <br />
       Authorization: Bearer token <br />
      <br />

    3. GET api/employee/id  => get employee details by id with associated contacts and addresss  <br />
      Header Parameters:-  <br />
       Authorization: Bearer token <br />
      <br />  

    4. PUT api/employee/id  => Update employee by id  <br />
      Header Parameters:-  <br />
       Authorization: Bearer token <br />
      Form Parameters:-  <br />
       name: text <br />
       age: text <br />
       job: text <br />
       salary: number <br />
       dep_id: text <br />
       contacts: number (or pass as array like contacts[0],contacts[1],... for multiple contact creation ) <br />
       address: text (or pass as array like address[0],address[1],... for multiple address creation ) <br />
      <br /> 

    5. DELETE api/employee/id  => Delete employee by id  <br />
      Header Parameters:-  <br />
       Authorization: Bearer token <br />
      <br />  
    
    6. GET api/search-employee  => Search employee by name  <br />
      Header Parameters:-  <br />
       Authorization: Bearer token <br />
      Query Parameters:-  <br />
       name: text <br />
      <br />  

  
