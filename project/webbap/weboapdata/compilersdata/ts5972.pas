program t5z16;
var x,n:real;
      r:real;

function xn(x,n:real):real;
       var i:real;
       begin
           i:=abs(x);
           if x<0 then
            xn:=(-1)*exp(n*ln(i))
           else
            xn:=exp(n*ln(i))
       end;

function nx(x,n:real):real;
       var t:real;
       begin
           t:=abs(x);
           if n<0 then
            nx:=(-1)*exp(x*ln(t))
           else
            nx:=exp(x*ln(t))
       end;