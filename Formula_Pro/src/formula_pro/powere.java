/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package formula_pro;


public class powere extends electricityp implements physics {

    public powere() {
    }

    
    @Override
    public double getresult() {
        return (V*V)/Re;
    }   
}
