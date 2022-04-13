var a,b,c,d,s:real;
Begin
     readln(a,b,c,d);
     s:=((a+b)/2)*sqrt(sqr(c)-(sqr(b-a)+sqr(c)-sqr(d))/(2*(b-a)));
     writeln(s:5:3);
End.