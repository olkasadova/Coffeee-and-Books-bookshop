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

        //get price value of the 0-indexed item 
        cy.get('[data-cy = "card_price"]').eq(0).then(($div) => {
          const price = $div.text();
          cy.wrap (price).as('price');
        });
        
        //click the link with 0 index
        cy.get('[data-cy = "add-cart"]').eq(0).click()
        
      //check that user is redirected to Add to Cart page and has 
      
        cy.url().should('include', '/added')
        cy.get('.input-group').get ('p').contains ("added to your cart")

        // verify that author value got on the Home page is present in the Added message
        cy.get('@author').then(auth=> {
          cy.get('.input-group').get ('p').should('contain', auth)
          cy.log (auth);
        })
       
        cy.clickLink("View Your Cart")
        cy.url().should('include', '/cart')

        // verify that author value got on the Home page is present in the Cart
        cy.get('@author').then(auth=> {
          cy.get('.input-group').get (".author").should ('contain', auth)
          cy.log (auth);})
        
        // verify that author value got on the Home page is present in the Cart
        cy.get('@price').then(price=> {
          cy.get('.input-group').get (".card_price").should ('contain', price)
          cy.log (price);})

          //check that items quantity is 1
          cy.get('.input-group').get (".quantity").should('have.value' (1))
    })
  })
