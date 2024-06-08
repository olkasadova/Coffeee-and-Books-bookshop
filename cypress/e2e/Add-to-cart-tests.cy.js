// test that one item can be successfully added to user's shopping cart

describe('Home page redirect for unlogged user', () => {
    it('visit the Home page', () => {
      cy.visit('http://localhost:5500/home.php')

     //check that user is redirected to Login page url
      cy.url().should('include', '/login')
      cy.log("Redirected from Home page to Login")
    })
  })