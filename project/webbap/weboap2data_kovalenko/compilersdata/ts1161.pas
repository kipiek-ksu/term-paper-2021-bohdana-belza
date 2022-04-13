program _45;
VAR
   s,v1,v2,t:real;
   a,b:byte;
Begin
     read(a);
     read(b);
     read(s);
     t:=(-a)/(b-a);
     v1:=s/(t-1);
     v2:=s/t;
     write(v1:0:3,,v2:0:3);
end.