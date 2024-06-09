describe('Register with all valid data', () => {
    it('open Register page and create a user', () => {
      cy.visit('http://localhost:5500/register.php')
  
     //careate a user with random valid email and passowrd
      cy. register_random ()
      cy.get ('[data-cy = "reg-submit"]').click()
      
      cy.log("Random user was created successfully")
    })
  })

  describe('Login link redirects to Login page', () => {
    it('visit the Register page', () => {
      cy.visit('http://localhost:5500/register.php')
  
     //check that Register link redirects to Register page
      cy.clickLink("Login")
      cy.url().should('include', '/login')
      cy.log("Redirected from Register to Login page")
    })
  })