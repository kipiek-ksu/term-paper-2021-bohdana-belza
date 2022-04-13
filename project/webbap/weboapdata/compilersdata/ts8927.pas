program l7_22;
type arr= array [1..50] of real;
var lside1,rside1,step1:real;
procedure tabul(lSide,rSide:real;step:real);
var current:real;
    h:real;
    i,n:byte;
    m:arr;
begin
     h:=lside;
     n:=1;
     while (h>=lside)and(h<=rSide) do begin
           current:=sin(x*pi/180);
           x:=x+step;
           m[n]:=current;
           n:=n+1;
     end;
     for i:=1 to n-2 do
     write(m[i]:0:4,' ');
     write(m[i+1]:0:4);
end;
begin
     read(lside1,rside1,step1);
     tabul(lside1,rside1,step1);
end.
