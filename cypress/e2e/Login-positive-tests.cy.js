//Positive: open home page-> redirect to login page
describe('Home page redirect for unlogged user', () => {
    it('visit the Home page', () => {
      cy.visit('http://localhost:5500/home.php')

     //check that user is redirected to Login page url
      cy.url().should('include', '/login')
      cy.log("Redirected from Home page to Login")
    })
  })

//Positive: Login with the existing user with proper email and password-> check user name in Nav bar-> check cookie with session
describe('Login with valid email and password', () => {
  it('open Login page and log in', () => {
    cy.visit('http://localhost:5500/login.php')

   //login with valid email and passowrd
    cy. login ('olha@gmail.com', '12345')
    //verify that user is redirected to Hme page
    cy.url().should('include', '/home')
    //verify that session cookie was created
    cy.getCookie('PHPSESSID').should('exist')
    cy.log("Successful Login and redirect to Home page")
  })
})

describe('Register link redirects to Register page', () => {
  it('visit the Login page', () => {
    cy.visit('http://localhost:5500/login.php')

   //check that Register link redirects to Register page
    cy.clickLink("Register")
    cy.url().should('include', '/register')
    cy.log("Redirected from Login  to Register page")
  })
})