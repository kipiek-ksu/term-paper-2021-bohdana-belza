program acc;
var a,b,c,x,cd:integer;
Begin clrscr;
      writeln('Input number x');readln(x);
      a:= x div 100;
      b:= x div 10 mod 10;
      c:= x mod 10;
      cd:= c*10 +b;
      write(cd,' ',a);
      readln;
End.