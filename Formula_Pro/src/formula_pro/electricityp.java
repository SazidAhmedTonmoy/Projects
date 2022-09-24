/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package formula_pro;


public abstract class electricityp {
    double Q,I,t,V,E,Re,P;

    public electricityp() {
    }

    public electricityp(double Q, double I, double t, double V, double E, double Re, double P) {
        this.Q = Q;
        this.I = I;
        this.t = t;
        this.V = V;
        this.E = E;
        this.Re = Re;
        this.P = P;
    }

    public double getQ() {
        return Q;
    }

    public void setQ(double Q) {
        this.Q = Q;
    }

    public double getI() {
        return I;
    }

    public void setI(double I) {
        this.I = I;
    }

    public double getT() {
        return t;
    }

    public void setT(double t) {
        this.t = t;
    }

    public double getV() {
        return V;
    }

    public void setV(double V) {
        this.V = V;
    }

    public double getE() {
        return E;
    }

    public void setE(double E) {
        this.E = E;
    }

    public double getRe() {
        return Re;
    }

    public void setRe(double Re) {
        this.Re = Re;
    }

    public double getP() {
        return P;
    }

    public void setP(double P) {
        this.P = P;
    }
    
    public abstract double getresult();
}
