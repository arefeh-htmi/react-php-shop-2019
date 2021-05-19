import React, {Component} from 'react';
import {Route, Switch} from 'react-router-dom';


import FormSignIn from './FormSignIn.jsx'; 
import FormSignUp from './FormSignUp.jsx'; 
import NotFound from './NotFound.jsx';
import Main from './Main';  
import Shops from './Shops.jsx';
import SignOut from './SignOut.jsx'; 
  


// class define all routes which will be included to App for redirections and Links between all components
// in case we add a new component we should add its Route definition here (inside Switch ) to be accessible through url and navigation link
class Routes extends Component {
  render() {
    return (
      	<Switch>    
			<Route  exact path="/" component={Main} />  
			<Route  path="/signin" component={FormSignIn} /> 
			<Route  path="/signup" component={FormSignUp} />
			<Route  path="/shops" component={Shops} />
			<Route  path="/signout" component={SignOut} />
			<Route   component={NotFound} /> 
      </Switch>
    );
  }
}    
export default Routes;
  

  
