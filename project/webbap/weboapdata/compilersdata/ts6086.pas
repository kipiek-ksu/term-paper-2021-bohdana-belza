sprogram l10_16;
var s:string; f:text; a:array[1..100]of real; i,j:integer;  sa:real;
Begin
     readln(s);
     assign(f,s);
     reset(f);
     while not(eof(f)) do
     begin
          i:=i+1;
          read(f,a[i]);
          sa:=sa+a[i];
     end;
     close(f);
     for j:=1 to i do
     write(a[j]:0:0,' ');
     writeln;
     write(sa:0:2);
End.