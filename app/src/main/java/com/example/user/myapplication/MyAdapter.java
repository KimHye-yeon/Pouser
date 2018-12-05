package com.example.user.myapplication;
import android.content.Context;
import android.graphics.drawable.Drawable;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.ArrayList;

import static com.example.user.myapplication.R.layout.custom__listview;

public class MyAdapter extends BaseAdapter {

    private ArrayList<MyItem> myItems = new ArrayList<>();

    @Override
    public int getCount() {
        return myItems.size();
    }

    @Override
    public Object getItem(int i) {
        return myItems.get(i);
    }

    @Override
    public long getItemId(int i) {
        return 0;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        Context context = parent.getContext();

        if (convertView == null) {
            LayoutInflater inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            convertView = inflater.inflate(R.layout.custom__listview, parent, false);
        }

        ImageView mem_image = (ImageView)convertView.findViewById(R.id.profil_view);
        TextView rank_view = (TextView)convertView.findViewById(R.id.ranknum_view);
        TextView name_view = (TextView)convertView.findViewById(R.id.name_view);
        TextView score_view = (TextView)convertView.findViewById(R.id.buljum_view);
        ImageView arrow_view = (ImageView)convertView.findViewById(R.id.arrow);

        MyItem myItem = (MyItem) getItem(position);

        mem_image.setImageDrawable(myItem.getMember_image());
        rank_view.setText(myItem.getRank_num());
        name_view.setText(myItem.getName());
        score_view.setText(myItem.getScore());
        arrow_view.setImageDrawable(myItem.getArrow());

        return convertView;
    }

    public void addItem(Drawable mem_image, String rank, String name, String score, Drawable arrow){

        MyItem myItem = new MyItem();

        myItem.setMember_image(mem_image);
        myItem.setRank_num(rank);
        myItem.setName(name);
        myItem.setScore(score);
        myItem.setArrow(arrow);

        myItems.add(myItem);
    }
}
