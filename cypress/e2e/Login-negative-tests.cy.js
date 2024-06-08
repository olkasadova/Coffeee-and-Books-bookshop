describe('Login with invalid email', () => {
    it('open Login page and log in', () => {
      cy.visit('http://localhost:5500/login.php')
  
     //login with incorrect email 
      cy. login ('olha123@gmail.com', '12345')
      //verify that user is redirected to Home page
      cy.url().should('include', '/login')
      //verify an error was displayed
      cy.get ('[class = "error"]').contains ("Your e-mail or passowrd were not found")
      cy.log("User was not logged in and redirected to Home page with incorrect email")
    })
  })

  describe('Login with invalid password', () => {
    it('open Login page and log in', () => {
      cy.visit('http://localhost:5500/login.php')
  
     //login with incorrect passowrd
      cy. login ('olha@gmail.com', '1')
      //verify that user is redirected to Home page
      cy.url().should('include', '/login')
      cy.get ('[class = "error"]').contains ("Your e-mail or passowrd were not found")
      cy.log("User was not logged in and redirected to Home page with incorrect password")
    })
  })

  describe('Login with empty email and password', () => {
    it('open Login page and log in', () => {
      cy.visit('http://localhost:5500/login.php')
  
     //do not enter email and passowrd, click Login 
     cy.get ('[data-cy = "login-submit"]').click ()
      //verify that user is redirected to Hme page
      cy.url().should('include', '/login')
      cy.log("User was not logged in and redirected to Home page with empty email and passowrd")
    })
  })