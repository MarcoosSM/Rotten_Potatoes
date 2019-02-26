package com.iesvillaverde.franl.minesweaper;

public class Box {
    private int x,y,width;
    private boolean selected = false;
    private int content = 0;
    private boolean isFlagged = false;

    public void setXY(int x, int y, int width){
        this.x = x;
        this.y = y;
        this.width = width;
    }


    public boolean selected(int xx, int yy){

        if(xx >= this.x && xx<=this.x+this.width && yy >= this.y && yy<=this.y+this.width){
            return true;
        }else
            return false;
    }

    public boolean getSelected() {
        return selected;
    }

    public int getContent() {
        return content;
    }

    public void setSelected(boolean selected) {
        this.selected = selected;
    }
    public void setContent(int content) {
        this.content = content;
    }

    public boolean getFlagged() {
        return isFlagged;
    }

    public void setFlagged(boolean flagged) {
        isFlagged = flagged;
    }
}
