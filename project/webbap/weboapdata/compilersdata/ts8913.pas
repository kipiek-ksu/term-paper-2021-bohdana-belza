
program t;
var sum,s,t:real;
function F(x,y,z:real):real;
    begin
    F:=(2*x-y-sin(z))/(5+abs(z));
    end;
        begin
          read(s,t);
          sum:= F(t,(-2*s),1.17)+f(2.2,t,s-t);
          write(sum:7:3);
        end.