program l6_1;
var i,j:integer; a:array[1..3]of integer; b:array[1..3,1..3]of integer;
Begin
     readln(a[1],a[2],a[3]);
     for i:=1 to 3 do
     begin
          for j:=1 to 3 do
          begin
               b[i,j]:=a[i]-3*a[j];
               write(b[i,j]:3);
          end;
          writeln;
     end;
End.