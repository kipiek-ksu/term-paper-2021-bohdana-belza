program l6_16;
var a:array[1..100,1..100] of real;
    m,i,j:byte;

Begin
     readln(m);
     for i:=1 to m do
     begin
          for j:=1 to m do
              read(a[i,j]);
          writeln;
     end;

     for i:=1 to m do
     begin
          for j:=1 to m do
          if j>=i then write('0.0',' ')
                  else write(a[i,j]:0:1,' ');
          writeln;
     end;
End.