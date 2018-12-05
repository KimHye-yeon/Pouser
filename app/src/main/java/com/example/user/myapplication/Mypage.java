package com.example.user.myapplication;

import android.content.Intent;
import android.graphics.drawable.ShapeDrawable;
import android.graphics.drawable.shapes.OvalShape;
import android.media.Image;
import android.os.Build;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;

public class Mypage extends AppCompatActivity {

    boolean check;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mypage);

        ImageView my_image_view = (ImageView)findViewById(R.id.profile_image_view);

        my_image_view.setBackground(new ShapeDrawable(new OvalShape()));
        my_image_view.setClipToOutline(true);
        my_image_view.setBackgroundResource(R.color.transparent);

        Button ok_btn = (Button)findViewById(R.id.ok_button);

        ok_btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent main_intent = new Intent(Mypage.this, MainActivity.class);
                startActivity(main_intent);
            }
        });
    }
}
