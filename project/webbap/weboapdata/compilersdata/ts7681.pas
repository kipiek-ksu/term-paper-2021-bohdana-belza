var
   i,sum,x:integer;
   sa:real;
   f:string;
   Tfile:text;
begin
     readln(f);
     assign(Tfile,f);
     reset(tfile);
     repeat


           read(Tfile,x);
           if eof(tfile) then writeln(x)
              else write(x,' ');
           sum:=sum+x;
           inc(i);
     until eof(tfile);
     sa:=sum/i;
     writeln(sa:0:2);
     close(tfile);
end.