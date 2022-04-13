program lr6z12;
 var i,i2,k,b: integer;
     t: real;
 begin
  b:=0;
  readln(k);
   for i:=1 to k do
     for i2:=1 to j do
       begin
        t:=sqr(i)-sqr(i2);
        t:=t/k;
        t:=t*Pi/180;
        t:=sin(t);
        if t>0 then b:=b+1;
       end;
   write(b);
 end.