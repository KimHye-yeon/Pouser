package com.example.user.myapplication;

import android.content.Intent;
import android.media.Image;
import android.os.Handler;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        Mypage mypage = new Mypage();

        Intent splash_intent = new Intent(this, Splash.class);
        startActivity(splash_intent);

        ImageButton btn_login = (ImageButton)findViewById(R.id.login_btn);
        ImageButton btn_home = (ImageButton)findViewById(R.id.home_btn);
        ImageButton btn_mypage = (ImageButton)findViewById(R.id.mypage_btn);
        ImageButton btn_rank = (ImageButton)findViewById(R.id.rank_btn);
        ImageButton btn_board = (ImageButton)findViewById(R.id.board_btn);

        btn_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent login_intent = new Intent(MainActivity.this, Login.class);
                startActivity(login_intent);
            }
        });

        btn_home.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Toast.makeText(MainActivity.this, "home click", Toast.LENGTH_SHORT).show();
            }
        });

        btn_mypage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent mypage_intent = new Intent(MainActivity.this, Mypage.class);
                startActivity(mypage_intent);
            }
        });

        btn_rank.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent rank_intent = new Intent(MainActivity.this, Rank.class);
                startActivity(rank_intent);
            }
        });

        btn_board.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Toast.makeText(MainActivity.this, "board click", Toast.LENGTH_SHORT).show();
            }
        });
    }
}
