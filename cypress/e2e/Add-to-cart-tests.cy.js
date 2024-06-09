// test that one item can be successfully added to user's shopping cart

describe('Home page redirect for unlogged user', () => {
    it('visit the Home page', () => {
      cy.visit('http://localhost:5500/home.php')
     
      //login with valid email and passowrd
      cy. login ('olha@gmail.com', '12345')

      //click the link with 1st index
      cy.get('[data-cy = "add-cart"]').eq(0).click()

     //check that user is redirected to Add to Cart page and has 
      cy.url().should('include', '/added')
      cy.get('.input-group').get ('p').contains ("added to your cart")
      cy.clickLink("View Your Cart")
      
    //  cy.log("Redirected from Home page to Login")
    })
  })