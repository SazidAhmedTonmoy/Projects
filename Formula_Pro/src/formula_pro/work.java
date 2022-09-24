/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package formula_pro;


public abstract class work {
    
    double f,w,s,h,v,m,a,ek,ep;
    final double g;

    public work() {
        this.g = 9.8;
    }
    
    
    public work(double f, double w, double s, double h, double v, double m, double a, double ek, double ep) {
        this.g = 9.8;
        this.f = f;
        this.w = w;
        this.s = s;
        this.h = h;
        this.v = v;
        this.m = m;
        this.a = a;
        this.ek = ek;
        this.ep = ep;
    }

    public double getF() {
        return f;
    }

    public void setF(double f) {
        this.f = f;
    }

    public double getW() {
        return w;
    }

    public void setW(double w) {
        this.w = w;
    }

    public double getS() {
        return s;
    }

    public void setS(double s) {
        this.s = s;
    }

    public double getH() {
        return h;
    }

    public void setH(double h) {
        this.h = h;
    }

    public double getV() {
        return v;
    }

    public void setV(double v) {
        this.v = v;
    }

    public double getM() {
        return m;
    }

    public void setM(double m) {
        this.m = m;
    }

    public double getA() {
        return a;
    }

    public void setA(double a) {
        this.a = a;
    }

    public double getEk() {
        return ek;
    }

    public void setEk(double ek) {
        this.ek = ek;
    }

    public double getEp() {
        return ep;
    }

    public void setEp(double ep) {
        this.ep = ep;
    }
    
    public abstract double getresult();
    
    
}
