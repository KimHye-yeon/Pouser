package com.example.user.myapplication;

import android.graphics.drawable.Drawable;

class MyItem {

    private Drawable member_image;
    private String rank_num;
    private String name;
    private String score;
    private Drawable arrow;

    public Drawable getMember_image() {
        return member_image;
    }

    public void setMember_image(Drawable member_image) {
        this.member_image = member_image;
    }

    public String getRank_num() {
        return rank_num;
    }

    public void setRank_num(String rank_num) {
        this.rank_num = rank_num;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getScore() {
        return score;
    }

    public void setScore(String score) {
        this.score = score;
    }

    public Drawable getArrow() {
        return arrow;
    }

    public void setArrow(Drawable arrow) {
        this.arrow = arrow;
    }
}
