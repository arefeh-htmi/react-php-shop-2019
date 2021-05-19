import React, { Component } from 'react';  
import {BrowserRouter} from 'react-router-dom';  


import Routes from './Routes';  
//import logo from './logo.svg';    



 
//<div><Routes /><Redirect to = {'/signin'} /></div> 
 

class App extends Component {

  
  render() {

      return ( 
          <BrowserRouter  >  
              <div className="App"> 
                  <div className="header">   
                  <div className="App-logo"></div>
                      {/* <br /><h1> Web Application Cooding Challenge</h1><hr /> */}
                      <ul>
                          <li>Login</li>
                          <li>Register</li>
                      </ul>
                  </div>
                  < Routes />
              </div> 
          </BrowserRouter>
      );
  }
} 
export default App;
