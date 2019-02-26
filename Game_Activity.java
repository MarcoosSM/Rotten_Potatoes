package com.iesvillaverde.franl.minesweaper;

import android.content.Intent;
import android.os.Bundle;
import android.os.CountDownTimer;
import android.os.SystemClock;
import android.support.v7.app.AppCompatActivity;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.MotionEvent;
import android.view.View;
import android.view.ViewGroup;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.Chronometer;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import java.util.Random;

public class Game_Activity extends AppCompatActivity implements View.OnTouchListener {
    private Chronometer mChronometer;
    private long lastPause;
    private long timePassed = 0;
    private CountDownTimer counter;
    private TextView textTimer;
    private LinearLayout linearLayoutMines;
    private Board background;
    private Button buttonFlag;
    private  int x,y;
    private boolean buttonFlagActivated;
    private boolean active;
    private int lenght = 0;
    private long seed = 0;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        requestWindowFeature(Window.FEATURE_NO_TITLE);
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, WindowManager.LayoutParams.FLAG_FULLSCREEN);
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_game);
        Bundle bundle = getIntent().getExtras();
        linearLayoutMines = findViewById(R.id.linearLayoutMines);
        buttonFlag = findViewById(R.id.buttonFlag);
        background = new Board(this);
        mChronometer = findViewById(R.id.chronometer);
        textTimer = findViewById(R.id.textViewTimer);
        background.setOnTouchListener(this);
        LayoutInflater inflater = (LayoutInflater) getSystemService(LAYOUT_INFLATER_SERVICE);
        ViewGroup rootView  = (ViewGroup) inflater.inflate(R.layout.activity_game, null);
        linearLayoutMines.addView(background);
        lenght = bundle.getInt("lenght");
        background.setLenght(lenght);
        for (int i = 0; i < lenght; ++i){
            for (int j = 0; j < lenght; ++j){
                background.boxes[i][j] = new Box();
            }

        }
        getSupportActionBar().show();
        textTimer.setText(R.string.timer);
        mChronometer.setBase(SystemClock.elapsedRealtime());
        mChronometer.start();
        this.BombDispose();
        this.CountBombsPerimeter();
        active = true;
        buttonFlagActivated = false;
        background.invalidate();

    }


    public void pressed(){
        background.boxes = new Box[lenght][lenght];
        for (int i = 0; i < lenght; ++i){
            for (int j = 0; j < lenght; ++j){
                background.boxes[i][j] = new Box();
            }

        }
        mChronometer.stop();
        mChronometer.setBase(SystemClock.elapsedRealtime());
        this.BombDispose();
        this.CountBombsPerimeter();
        active = true;
        background.invalidate();
        mChronometer.start();
    }
    public void resetGame(){
        background.boxes = new Box[lenght][lenght];
        for (int i = 0; i < lenght; ++i){
            for (int j = 0; j < lenght; ++j){
                background.boxes[i][j] = new Box();
            }

        }
        mChronometer.stop();
        mChronometer.setBase(SystemClock.elapsedRealtime());
        int amount = lenght;
        Random generator = new Random();
        generator.setSeed(seed);
        do{
            int row = (int)(generator.nextDouble()*lenght);
            int column = (int)(generator.nextDouble()*lenght);

            if(background.boxes[row][column].getContent() == 0){
                background.boxes[row][column].setContent(80);
                --amount;
            }
        }while(amount != 0);
        this.CountBombsPerimeter();
        active = true;
        background.invalidate();
        mChronometer.start();
    }

    private void CountBombsPerimeter() {
        for (int i = 0; i < lenght; ++i){
            for (int j = 0; j < lenght; ++j) {
                if(background.boxes[i][j].getContent() == 0){
                    int amount = countCoordinate(i,j);
                    background.boxes[i][j].setContent(amount);
                }

            }

        }
    }

    private int countCoordinate(int i, int j) {
        int total = 0;
        if(i - 1 >= 0 && j-1 >= 0){
            if(background.boxes[i - 1][j - 1].getContent() == 80){
                ++total;
            }
        }

        if(i-1 >= 0){
            if(background.boxes[i-1][j].getContent() == 80){
                ++total;
            }
        }
        if(i-1 >= 0 && j+1 < lenght){
            if(background.boxes[i-1][j+1].getContent() == 80){
                ++total;
            }
        }
        if(j+1 < lenght){
            if(background.boxes[i][j+1].getContent() == 80){
                ++total;
            }
        }
        if(i+1 < lenght && j+1 < lenght){
            if(background.boxes[i+1][j+1].getContent() == 80){
                ++total;
            }
        }
        if(i+1 < lenght){
            if(background.boxes[i+1][j].getContent() == 80){
                ++total;
            }
        }
        if(i+1 < lenght && j - 1 >= 0){
            if(background.boxes[i+1][j-1].getContent() == 80){
                ++total;
            }
        }
        if(j-1 >= 0){
            if(background.boxes[i][j - 1].getContent() == 80){
                ++total;
            }
        }
        return total;
    }

    private void BombDispose() {
        int amount = lenght;
        seed = System.currentTimeMillis();
        Random generator = new Random();
        generator.setSeed(seed);
        do{
            int row = (int)(generator.nextDouble()*lenght);
            int column = (int)(generator.nextDouble()*lenght);

            if(background.boxes[row][column].getContent() == 0){
                background.boxes[row][column].setContent(80);
                --amount;
            }
        }while(amount != 0);

    }

    @Override
    public boolean onTouch(View v, MotionEvent event) {

        if(active){
            for (int i = 0; i < lenght; ++i){
                for (int j = 0; j < lenght; ++j){
                    if(background.boxes[i][j].selected((int)event.getX(),(int)event.getY())){
                        if(buttonFlagActivated){
                            if(background.boxes[i][j].getFlagged()){
                                background.boxes[i][j].setFlagged(false);
                            }else if(!background.boxes[i][j].getFlagged() && !background.boxes[i][j].getSelected()){
                                background.boxes[i][j].setFlagged(true);
                            }
                        }else{
                            background.boxes[i][j].setFlagged(false);
                            background.boxes[i][j].setSelected(true);
                            if(background.boxes[i][j].getContent()==80){
                                background.boxes[i][j].setFlagged(false);
                                Toast.makeText(this,"BOOOOM",Toast.LENGTH_LONG).show();
                                active = false;
                            }else if(background.boxes[i][j].getContent() == 0){
                                background.boxes[i][j].setFlagged(false);
                                goAcross(i,j);
                            }

                        }
                        background.invalidate();
                    }
                }

            }
        }


        if(win() && active){
            Toast.makeText(this,"COMPLETADO!",Toast.LENGTH_LONG).show();
            active = false;
        }
        return false;
    }

    private boolean win() {
        int amount = lenght*lenght;
        for (int i = 0; i < lenght; ++i){
            for (int j = 0; j < lenght; ++j) {
                if(background.boxes[i][j].getSelected()){
                    --amount;
                }
            }
        }
        if(amount == lenght){
            return true;
        }else
            return false;
    }

    private void goAcross(int i, int j) {

        if(i  >= 0 && i < lenght &&  j >= 0 && j < lenght){
            if(background.boxes[i][j].getContent() == 0){
                background.boxes[i][j].setSelected(true);
                background.boxes[i][j].setFlagged(false);
                background.boxes[i][j].setContent(50);
                goAcross(i,j+1);
                goAcross(i,j-1);
                goAcross(i+1,j);
                goAcross(i-1,j);
                goAcross(i-1,j-1);
                goAcross(i-1,j+1);
                goAcross(i+1,j+1);
                goAcross(i+1,j-1);

            }else if(background.boxes[i][j].getContent() >= 1 && background.boxes[i][j].getContent() <= lenght){
                background.boxes[i][j].setSelected(true);
                background.boxes[i][j].setFlagged(false);
            }
        }
    }
    public void setFlags(View view){
        if(buttonFlagActivated){
            buttonFlagActivated = false;
            buttonFlag.setText(R.string.buttonFlagNo);
        }else{
            buttonFlagActivated = true;
            buttonFlag.setText(R.string.buttonFlagYes);
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.actionbar,menu);
        return super.onCreateOptionsMenu(menu);
    }

    public boolean onOptionsItemSelected(MenuItem item){
        switch(item.getItemId()){
            case R.id.newGameActionBar:
                pressed();
                return true;
            case R.id.restartGameActionBar:
                resetGame();
                return true;
            case R.id.changeLanguajeActionBar:
                changeLenguage();
                finish();
                return true;
            case R.id.backMenuActionBar:
                toMenu();
                finish();
                return true;
            default:
                return super.onOptionsItemSelected(item);
        }
    }
    private void changeLenguage(){
        Intent settingsActivity = new Intent(this, Settings_Activity.class);
        getSupportActionBar().hide();
        startActivity(settingsActivity);
    }

    private void toMenu(){
        Intent menuActivity = new Intent(this, Activity_Main.class);
        getSupportActionBar().hide();
        startActivity(menuActivity);
    }
    @Override
    public boolean onTouch(View v, MotionEvent event) {

        if(active){
            for (int i = 0; i < lenght; ++i){
                for (int j = 0; j < lenght; ++j){
                    if(background.boxes[i][j].selected((int)event.getX(),(int)event.getY())){
                        if(buttonFlagActivated){
                            background.boxes[i][j].setFlagged(true);
                        }else{
                            background.boxes[i][j].setSelected(true);
                            if(background.boxes[i][j].getContent()==80){
                                background.boxes[i][j].setFlagged(false);
                                mChronometer.stop();
                                Toast.makeText(this,"BOOOOM",Toast.LENGTH_LONG).show();
                                active = false;
                            }else if(background.boxes[i][j].getContent() == 0){
                                background.boxes[i][j].setFlagged(false);
                                goAcross(i,j);
                            }

                        }
                        background.invalidate();
                    }
                }

            }
        }


        if(win() && active){
            Toast.makeText(this,"COMPLETADO!",Toast.LENGTH_LONG).show();
            active = false;
        }
        return false;
    }

    private boolean win() {
        int amount = lenght*lenght;
        for (int i = 0; i < lenght; ++i){
            for (int j = 0; j < lenght; ++j) {
                if(background.boxes[i][j].getSelected()){
                    --amount;
                }
            }
        }
        if(amount == lenght){
            return true;
        }else
            return false;
    }

    private void goAcross(int i, int j) {

        if(i  >= 0 && i < lenght &&  j >= 0 && j < lenght){
            if(background.boxes[i][j].getFlagged()){
                background.boxes[i][j].setFlagged(false);
            }
            if(background.boxes[i][j].getContent() == 0){
                background.boxes[i][j].setSelected(true);
                background.boxes[i][j].setContent(50);
                goAcross(i,j+1);
                goAcross(i,j-1);
                goAcross(i+1,j);
                goAcross(i-1,j);
                goAcross(i-1,j-1);
                goAcross(i-1,j+1);
                goAcross(i+1,j+1);
                goAcross(i+1,j-1);

            }else if(background.boxes[i][j].getContent() >= 1 && background.boxes[i][j].getContent() <= lenght){
                background.boxes[i][j].setSelected(true);
            }
        }
    }
    public void setFlags(View view){
        if(buttonFlagActivated){
            buttonFlagActivated = false;
            buttonFlag.setText(R.string.buttonFlagNo);
        }else{
            buttonFlagActivated = true;
            buttonFlag.setText(R.string.buttonFlagYes);
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.actionbar,menu);
        return super.onCreateOptionsMenu(menu);
    }

    public boolean onOptionsItemSelected(MenuItem item){
        switch(item.getItemId()){
            case R.id.newGameActionBar:
                pressed();
                return true;
            case R.id.restartGameActionBar:
                resetGame();
                return true;
            case R.id.changeLanguajeActionBar:

                return true;
            case R.id.backMenuActionBar:

                return true;
            default:
                return super.onOptionsItemSelected(item);
        }
    }



}
