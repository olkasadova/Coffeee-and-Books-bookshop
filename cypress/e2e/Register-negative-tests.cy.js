describe('Register with password and re-eneterd passowrd that do not match', () => {
    it('open Register page and create a user', () => {
      cy.visit('http://localhost:5500/register.php')
  
     //careate a user with random valid email and passowrd
     cy. register_random ()
      
      cy.get ('[data-cy = "reg-submit"]').click()
      //set user with the same email but different first and last names
      //get first and last name and add1 to the end
      cy.get('[data-cy = "first-name"]').invoke('val').then ((fname)=>{
        cy.get ('[data-cy = "first-name"]').clear().type (fname + '1')
      })
      cy.get('[data-cy = "last-name"]').invoke('val').then ((lname)=>{
        cy.get ('[data-cy = "last-name"]').clear().type (lname +'1')
      })
      //get email and put the same one
      cy.get('[data-cy = "reg-email"]').invoke('val').then ((email)=>{
        cy.get ('[data-cy = "reg-email"]').clear().type (email)
      })
      cy.get('[data-cy = "reg-password"]').clear().type ('98765')
      cy.get('[data-cy = "confirmPassword"]').clear().type ('98765')
      
      //verify that error message appears
      cy.get ('[data-cy = "error"]').contains ("Email address is already regitered")
      cy.log("Email address is already regitered")
    })
  })

  describe('Register with password and re-eneterd passowrd that do not match', () => {
    it('open Register page and create a user', () => {
      cy.visit('http://localhost:5500/register.php')
  
     //careate a user with random valid email and passowrd
      cy. register ("Jack", "London", "jlondon@yahoo.com", "12345", "123")
      //verify that user is redirected to Hme page
      cy.get ('[data-cy = "reg-submit"]').click()
      //verify that error message appears
      cy.get ('[data-cy = "error"]').contains ("Passwords do not match")
      cy.log("Error message appeared Passwords do not match")
    })
  })