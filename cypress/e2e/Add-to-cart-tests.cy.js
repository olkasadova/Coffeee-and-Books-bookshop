// test that one item can be successfully added to user's shopping cart

describe('Home page redirect for unlogged user', () => {
    it('visit the Home page', () => {
      cy.visit('http://localhost:5500/home.php')
     
      //login with valid email and passowrd
      cy. login ('olha@gmail.com', '12345')

      cy.get ('[data-cy = "card_author"]').contains ("Harper Lee")
      cy.get ('[data-cy = "add-cart"]').click()

     //check that user is redirected to Add to Cart page
      cy.url().should('include', '/added')

    //  cy.log("Redirected from Home page to Login")
    })
  })