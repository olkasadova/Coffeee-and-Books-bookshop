describe('Register with all valid data', () => {
    it('open Register page and create a user', () => {
      cy.visit('http://localhost:5500/register.php')
  
     //login with valid email and passowrd
      cy. register ("Jack", "London", "jlondon@yahoo.com", "12345", "12345")
      //verify that user is redirected to Hme page
      cy.url().should('include', '/home')
      //verify that session cookie was created
      cy.getCookie('PHPSESSID').should('exist')
      cy.log("Successful Login and redirect to Home page")
    })
  })