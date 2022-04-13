Program pr23;
Var y,sum:real;
function f(m:real;n:integer):real;
         var l:byte;step:real;
         begin
         step:=1;
         for l:=1 to n do
         step:=(step*m);
         f:=step;
         end;
function t(x:real):real;
         var k:integer; c,z:real;
         begin
         c:=0;
         z:=0;
         for k:=0 to 10 do
             begin
             c:=c+(f(x,2*k+1))/(2*k+1);
             z:=z+(f(x,2*k))/(2*k+1);
             end;
         t:= c/z;
         end;
begin
read(y);
sum:=(1.7*t(0.25)+2*t(1+y))/(6-(t(sqr(y)-1)));
writeln(sum:0:3);
readkey;
end.