/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package formula_pro;

/**
 *
 * @author sanzi
 */
public class sphere extends volume implements math{

    public sphere() {
    }
    
    
    @Override
    public double getVolume() {
        return (4/3.0)*pi*r*r*r;
    }
    
}
