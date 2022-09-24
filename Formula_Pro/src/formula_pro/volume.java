/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package formula_pro;

public abstract class volume {
    double r,h,l,w;
    final double pi= 3.1416;

    public volume() {
    }

    public volume(double r, double h, double l, double w) {
        this.r = r;
        this.h = h;
        this.l = l;
        this.w = w;
    }

    public double getR() {
        return r;
    }

    public void setR(double r) {
        this.r = r;
    }

    public double getH() {
        return h;
    }

    public void setH(double h) {
        this.h = h;
    }

    public double getL() {
        return l;
    }

    public void setL(double l) {
        this.l = l;
    }

    public double getW() {
        return w;
    }

    public void setW(double w) {
        this.w = w;
    }
    
    public abstract double getVolume();
    
}
