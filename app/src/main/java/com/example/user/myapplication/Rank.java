package com.example.user.myapplication;

import android.os.Build;
import android.support.v4.content.ContextCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.ContextThemeWrapper;
import android.view.View;
import android.widget.ListView;

import java.util.ArrayList;
import java.util.List;

public class Rank extends AppCompatActivity {

    ListView myItemArrayList;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_rank);

        myItemArrayList = (ListView)findViewById(R.id.rank_view);

        dataSetting();
    }

    private void dataSetting(){

        MyAdapter myAdapter = new MyAdapter();

        for(int i = 1; i <= 10; i++){
            myAdapter.addItem(ContextCompat.getDrawable(getApplicationContext(), R.drawable.member_image), i + "." , "이  름", "벌점 : " + i + "점", ContextCompat.getDrawable(getApplicationContext(),R.drawable.arrow));
        }

        myItemArrayList.setAdapter(myAdapter);
    }
}
