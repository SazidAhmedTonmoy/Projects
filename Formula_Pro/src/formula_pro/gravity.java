/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package formula_pro;


public abstract class gravity  {

        double m1,m2,d,v,T,h,R,L;
        final double g=9.8;
        final double G= 6.674*Math.pow(10,-11);
        final double pi = 3.1416;

    public gravity() {
    }

    public gravity(double m1, double m2, double d, double v, double T, double h, double R, double L) {
        this.m1 = m1;
        this.m2 = m2;
        this.d = d;
        this.v = v;
        this.T = T;
        this.h = h;
        this.R = R;
        this.L = L;
    }

    

    public double getM1() {
        return m1;
    }

    public void setM1(double m1) {
        this.m1 = m1;
    }

    public double getM2() {
        return m2;
    }

    public void setM2(double m2) {
        this.m2 = m2;
    }

    public double getD() {
        return d;
    }

    public void setD(double d) {
        this.d = d;
    }

    public double getR() {
        return R;
    }

    public void setR(double R) {
        this.R = R;
    }

    public double getV() {
        return v;
    }

    public void setV(double v) {
        this.v = v;
    }

    public double getT() {
        return T;
    }

    public void setT(double T) {
        this.T = T;
    }

    public double getH() {
        return h;
    }

    public void setH(double h) {
        this.h = h;
    }

    public double getL() {
        return L;
    }

    public void setL(double L) {
        this.L = L;
    }
    

    
    public abstract double getresult();    
        
}
