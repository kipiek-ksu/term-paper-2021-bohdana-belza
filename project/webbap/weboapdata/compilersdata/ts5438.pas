program l4_21;
var x,y,z:real;
Begin
     readln(x,y,z);
     if (a1/a2) <> (b1/b2) <> (c1/c2)
     then
     begin
          y:=(c2*a1-a2*c1)/(b2*a1-b1*a2);
          x:=(c1-b1*y)/a1;
          write(x:0:3,' ',y:0:3);
     end
     else write('no');
End.