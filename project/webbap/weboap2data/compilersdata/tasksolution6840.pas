Program T2z46;
var a,b,c:integer; t1,t2,t3:real;
Begin
Read(a,b,c);
t1:=1/(1/(2*a)+1/(2*b)-1/(2*c));
t2:=1/(1/a-(1/(2*a)+1/(2*b)-1/(2*c)));
t3:=1/(1/b-(1/(2*a)+1/(2*b)-1/(2*c)));
Write(t1:0:3,t2:0:3,t3:0:3);
End.