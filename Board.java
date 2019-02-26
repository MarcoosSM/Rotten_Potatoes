package com.iesvillaverde.franl.minesweaper;

import android.content.Context;
import android.graphics.Canvas;
import android.graphics.Paint;
import android.graphics.Typeface;
import android.util.Log;
import android.view.View;

public class Board extends View {
    private Canvas canvas;
    int lenght = 0;
    Box[][] boxes;


    public Board(Context context) {
        super(context);
    }

    @Override
    protected void onDraw(Canvas canvas) {
        super.onDraw(canvas);
        canvas.drawRGB(0,0,0);
        int width = 0;
        if(canvas.getWidth()<canvas.getHeight()){
            width = this.getWidth();
        }else
            width = this.getHeight();
        int widthBox = width/lenght;
        Paint brush = new Paint();
        brush.setTextSize(50);
        Paint brush2 = new Paint();
        brush2.setTextSize(50);
        brush2.setTypeface(Typeface.DEFAULT_BOLD);
        brush2.setARGB(255,0,0,255);
        Paint linearBrush = new Paint();
        linearBrush.setARGB(255,255,255,255);
        int rowAct = 0;
        for(int i = 0; i < lenght; ++i){
            for(int j = 0; j < lenght; ++j){
                Log.e("I", String.valueOf(widthBox));
                Log.e("J", String.valueOf(j));
                boxes[i][j].setXY(j*widthBox, rowAct, widthBox);
                if(!boxes[i][j].getSelected()){
                    brush.setARGB(153,204,204,204);
                }else{
                    brush.setARGB(255,153,153,153);
                }

                if(boxes[i][j].getFlagged()){
                    Paint flag = new Paint();
                    flag.setARGB(125,0,255,0);
                    canvas.drawRect(j*widthBox, rowAct, j*widthBox+widthBox-2,rowAct+widthBox-2,flag);
                    canvas.drawLine(j*widthBox, rowAct, j*widthBox+widthBox,rowAct,brush);
                    canvas.drawLine(j*widthBox+widthBox-1, rowAct, j*widthBox+widthBox-1,rowAct+widthBox,linearBrush);
                }else{
                    canvas.drawRect(j*widthBox, rowAct, j*widthBox+widthBox-2,rowAct+widthBox-2,brush);
                    canvas.drawLine(j*widthBox, rowAct, j*widthBox+widthBox,rowAct,brush);
                    canvas.drawLine(j*widthBox+widthBox-1, rowAct, j*widthBox+widthBox-1,rowAct+widthBox,linearBrush);
                }


                if(boxes[i][j].getContent()>=1 && boxes[i][j].getContent()<=8 && boxes[i][j].getSelected()){
                    canvas.drawText(String.valueOf(boxes[i][j].getContent()), j*widthBox+(widthBox/2)-lenght,rowAct+widthBox,brush2);
                }
                if(boxes[i][j].getContent()==80 && boxes[i][j].getSelected()){
                    Paint bomb = new Paint();
                    bomb.setARGB(255,255,0,0);
                    canvas.drawCircle(j*widthBox+(widthBox/2), rowAct+(widthBox/2),lenght,bomb);
                }

            }
            rowAct = rowAct + widthBox;
        }
        this.canvas = canvas;
    }


    public void setLenght(int lenght){
        this.lenght = lenght;
        boxes = new Box[lenght][lenght];
    }

}
