// test that one item can be successfully added to user's shopping cart

describe('Home page redirect for unlogged user', () => 
    {
      it('visit the Home page', () => 
        {
          
          cy.visit('http://localhost:5500/home.php')
        
          //login with valid email and passowrd
          cy. login ('olha@gmail.com', '12345')
          
          //get author value of the 0-indexed item 
          cy.get('[data-cy = "card_author"]').eq(0).then(($div) => {
            const author = $div.text();
            cy.wrap (author).as('author');
          });
          
          //click the link with 0 index
          cy.get('[data-cy = "add-cart"]').eq(0).click()
         // go to the cart
          cy.clickLink("View Your Cart")
         
          // verify that author value got on the Home page is present in the Cart
          cy.get('@author').then(auth=> {
            cy.get('.input-group').get (".author").should ('contain', auth)
            cy.log (auth);})
  
            //check that items quantity is 1

            cy.get('.input-group').get (".quantity").should('have.value', 1)
            cy.get('.input-group').get (".quantity").clear().type('0')
            cy.get('.total-group').get (".update-btn").click()
            cy.get ('.added-container').should ('contain', "cart is empty")
      })
    })
  