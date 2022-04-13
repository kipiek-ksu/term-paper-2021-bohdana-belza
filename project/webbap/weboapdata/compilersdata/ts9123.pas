Program z26;
Var a,b,h,x,f:real;
    i,n:integer;
Begin
Read(a);
Read(b);
Read(h);
n:=Round((b-a)/h);
x:=a;
For i:=1 to n do begin
f:=sin(2*x);
Write(f:6:4,'  ');
x:=x+h;
end;
end.